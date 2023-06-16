<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Orders;
use App\Http\Livewire\Forms;
use App\Models\Order;
use App\Models\File;
use App\Models\Task;
use App\Models\User;
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
        
        switch ($data['task_id']) {
            case 'get-promo':
                if ($request->file) {
                    foreach ($request->file as $file) {
                        $fileU = new File;
                        $this->files[] = $file;
                        // $file->store('public/orders');
                        $name = time().rand(1,100).'.'.$file->extension();
                        $path = public_path('public/orders/') . $name;
                        $file->storeAs('public/orders/', $name);
                        $fileU->name = $name;
                        $fileU->path = $path;
                        $fileU->save(); 
                    }
                }
                $data = Arr::except($data,['file','_token']);
                $task_id = Task::where('slug', $data['task_id'])->first()->id;
                $project_id = 1;
                $user_id = Auth::id();
                $user = User::where('id', $user_id)->first();
                $form_id = 1;
                $order_data = json_encode($data);
                $company_name = $data['company-name'];
                $niche = $data['niche'];
                $work = '';
                $jobs = $data['send-promo'];
                foreach ($jobs as $job) {
                    $work .= $job . ',';
                }
        
                $message = <<<EOL
                Компания: $company_name
                Сфера деятельности: $niche
                Что сделать: $work
                Задачу выдал: $user->name
                EOL;
                Mail::raw($message, function($msg) use ($company_name, $work)
                {
                    $msg->from(env('MAIL_FROM_ADDR'), 'Reception Desk');
                 
                    $msg->to('a.lapin@taraz.2gis.kz')->to('2gis_alapin+fmfo98oezd3tulgkhbce@boards.trello.com')->subject('Design: ' . $work . ' ' . $company_name);
                });        
        
        
                // 2gis_alapin+fmfo98oezd3tulgkhbce@boards.trello.com
                $order = new Order;
                $order->task_id = $task_id;
                $order->project_id = $project_id;
                $order->user_id = $user_id;
                $order->form_id = $form_id;
                $order->data = $order_data;
                $order->save();
        
                session()->flash('flash.banner', 'Заказ успешно добавлен');
                session()->flash('flash.bannerStyle', 'success');

                break;
            
            case 'add-user':

                $data = Arr::except($data,['file','_token']);
                $task_id = Task::where('slug', $data['task_id'])->first()->id;
                $project_id = 1;
                $user_id = Auth::id();
                $user = User::where('id', $user_id)->first();
                $form_id = 2;
                $order_data = json_encode($data);
                $firstname = $data['firstname'];
                $lastname = $data['lastname'];
                $middlename = $data['middlename'];
                $phone = $data['phone'];
                $birthday = $data['birthday'];

                $message = <<<EOL
                Имя: $firstname
                Фамилия: $lastname
                Отчество: $middlename
                Телефон: $phone
                Дата рождения: $birthday
                Разместил(а): $user->name
                EOL;
                Mail::raw($message, function($msg) use ($firstname, $lastname, $middlename, $phone, $user)
                {
                    $msg->from(env('MAIL_FROM_ADDR'), 'Reception Desk');
                 
                    $msg->to('a.lapin@taraz.2gis.kz')->to('2gis_alapin+fmfo98oezd3tulgkhbce@boards.trello.com')->subject('AD: ' . $firstname . ' ' . $lastname);
                });        

                $order = new Order;
                $order->task_id = $task_id;
                $order->project_id = $project_id;
                $order->user_id = $user_id;
                $order->form_id = $form_id;
                $order->data = $order_data;
                $order->save();

                session()->flash('flash.banner', 'Заявка на создание аккаунта успешно добавлена');
                session()->flash('flash.bannerStyle', 'success');

                break;
            case 'remove-user':

                $data = Arr::except($data,['file','_token']);
                $task_id = Task::where('slug', $data['task_id'])->first()->id;
                $project_id = 1;
                $user_id = Auth::id();
                $user = User::where('id', $user_id)->first();
                $form_id = 3;
                $order_data = json_encode($data);
                $username = $data['username'];
                $reason = $data['remove-reason'];
                
                $message = <<<EOL
                Аккаунт: $username
                Причина: $reason
                Разместил(а): $user->name
                EOL;
                Mail::raw($message, function($msg) use ($username, $reason)
                {
                    $msg->from(env('MAIL_FROM_ADDR'), 'Reception Desk: remove user');
                 
                    $msg
                        ->to('a.lapin@taraz.2gis.kz')
                        // ->to('2gis_alapin+fmfo98oezd3tulgkhbce@boards.trello.com')
                        ->subject('AD: ' . $username . ' ' . $reason);
                });        

                break; 
            default:
                # code...
                break;
        }
          
        return back();
    }

}
