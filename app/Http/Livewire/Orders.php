<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Orders;
use App\Http\Livewire\Forms;
use App\Models\Order;
use App\Models\File;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\Position;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class Orders extends Component
{
    use WithFileUploads;

    public $title, $slug;

    public $files;

    public function render()
    {
        $order_slug = collect(request()->segments())->last();

        $this->slug = $order_slug;
        $this->title = __('orders.titles.'.$order_slug);

        return view('livewire.orders.index')->with([
            'title' => $this->title,
            'slug' => $this->slug
        ])->layout('layouts.app');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $files_ids = [];

        if ($request->file) {
            foreach ($request->file as $file) {
                $fileU = new File;
                $this->files[] = $file;
                $name = time().rand(1,100).'.'.$file->extension();
                $store_path = ('orders');
                $file->storeAs($store_path,$name);
                $file_url = asset('storage/'.$store_path.'/'.$name);
                $fileU->name = $name;
                $fileU->path = $file_url;
                $fileU->save(); 
                $files_ids[] = $fileU->id;
                $data['attachments'][] = $file_url;
            }
        }

        $order_title = __('orders.titles.'.$data['task_id']);
        $user = User::where('id', Auth::id())->first();
        $task = Task::where('slug', $data['task_id'])->first();
        $project_id = $user->projects->first()->id;
        $project_title = $user->projects->first()->title;
        $user_id = $user->id;
        $task_type = $task->type;
        $form_id = 0;
        $data = Arr::except($data,['file','_token']);
        $mail_title = '';
        $data_json = json_encode($data);

        switch ($data['task_id']) {
            case 'get-promo':
                $company_name = $data['company-name'];
                $niche = $data['niche'];
                $list = implode(',', $data['send-promo']);
                $mail_title = $project_title . ', ' . $company_name . ', ' . $list;


                $message = <<<EOL
                Компания: $company_name
                Сфера деятельности: $niche
                Что сделать: $list
                Задачу выдал: $user->name
                mailto: <a href="$user->email">$user->email</a>
                EOL;
        
                session()->flash('flash.banner', 'Заказ успешно добавлен');
                session()->flash('flash.bannerStyle', 'success');

                break;
            
            case 'add-user':

                $firstname = $data['firstname'];
                $lastname = $data['lastname'];
                $middlename = $data['middlename'];
                $phone = $data['phone'];
                $birthday = $data['birthday'];
                $position = Position::where('slug', $data['position'])->first()->title;
                $project_title = Project::where('name', $data['project'])->first()->title;
                $project = $data['project'];
                $mail_title = $project_title . ', ' . $order_title . ' на должность ' . $position;

                $message = <<<EOL
                Проект: $project_title
                Имя: $firstname
                Фамилия: $lastname
                Отчество: $middlename
                Телефон: $phone
                Дата рождения: $birthday
                Должность: $position
                Разместил(а): $user->name
                EOL;


                session()->flash('flash.banner', 'Заявка на создание аккаунта успешно добавлена');
                session()->flash('flash.bannerStyle', 'success');

                break;
            case 'remove-user':
                $username = $data['username'];
                $reason = $data['remove-reason'];
                $project = Project::where('name', $data['project'])->first();
                
                $message = <<<EOL
                Аккаунт: $username
                Причина: $reason
                Проект: $project->title
                Разместил(а): $user->name
                EOL;
    

                session()->flash('flash.banner', 'Заявка на удаление пользователя размещена');
                session()->flash('flash.bannerStyle', 'success');

                break; 
            default:
                # code...
                break;
        }

        Mail::raw($message, function($msg) use ($mail_title, $task_type)
        {
            $msg->from(env('MAIL_FROM_ADDR'), 'Reception Desk');
            
            // $msg->to('a.lapin@taraz.2gis.kz')->subject("$task_type: " . $mail_title);
            $msg->to('a.lapin@taraz.2gis.kz')->to('2gis_alapin+fmfo98oezd3tulgkhbce@boards.trello.com')->subject("$task_type: " . $mail_title);
        });        

        $order = new Order;
        $order->task_id = $task->id;
        $order->project_id = $project_id;
        $order->user_id = $user_id;
        $order->form_id = $form_id;
        $order->data = $data_json;
        $order->save();
        $order->files()->sync($files_ids);
          
        return back();
    }

    public function status()
    {
        $order_id = collect(request()->segments())->last();
        $order = Order::where('id', $order_id)->first();
        
        return view('livewire.orders.status')->with([
            'title' => $this->title,
            'order' => $order,
            'data' => json_decode($order->data, true),
        ]);
    }

    public function statusTable()
    {
        
        return view('livewire.orders.status-table')->with([
            'title' => $this->title,
            'orders' => Order::where('user_id', Auth::id())->get(),
        ]);
    }

}
