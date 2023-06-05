<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LdapRecord\Container;
use LdapRecord\Connection;
use LdapRecord\Models\Entry;

use LdapRecord\Models\ActiveDirectory\User as LdapUser;
use LdapRecord\Models\Attributes\AccountControl;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;


class LdapTestCotroller extends Controller
{
    protected $ldap;

    public function index()
    {
        // Create a new connection:
        // $connection = new Connection([
        //     'hosts' => explode(',', env('LDAP_HOST', 'localhost')),
        //     'port' => env('LDAP_PORT', '389'),
        //     'base_dn' => env('LDAP_BASE_DN', 'dc=local,dc=com'),
        //     'username' => env('LDAP_USERNAME','cn=user,dc=local,dc=com'),
        //     'password' => env('LDAP_PASSWORD',''),
        //     'use_tls' => env('LDAP_TLS', false),
        //     'use_ssl' => env('LDAP_SSL', false)
        // ]);

        // // it worked!
        // $user = LdapUser::find('cn=Лапин Александр Игоревич,OU=Административный отдел,OU=Пользователи,'.env('LDAP_BASE_DN'));
        // $user->info = 'Senior Superadministrator'; 
        // $user->save();

        // Add the connection into the container:
        // $connectcont = Container::addConnection($connection);

        // Get immediate groups the user is apart of:
        // $groups = $user->groups()->get();



        // Get all objects:
        // $objects = Entry::get();

        // Get a single object:
        // $object = Entry::find('cn=Лапин Александр Игоревич,OU=Тараз,OU=Cities,DC=2gis,DC=local');

        // Getting attributes:
        // foreach ($object->memberof as $group) {
        //     echo $group;
        // }

        // Modifying attributes:
        // $object->company = 'My Company';

        // Saving changes:
        // $object->save();    
            
        //   $res = \Hash::check('SD5G9d8-h1?@#', '$2y$10$s5m.nH/ORNPt4RRmC2zpOueYKxRLNooesLtTrW0GPNv2EvjGMi99S');

        // $res = \Hash::check('123', '$2y$10$bExCBAWhrRGjvKpBBXwBROSU.vhe2zB5G0P2Nq3Cxwmm7RG3D6sR6');
        // $res = \Hash::make('123');
        // dd($res);

        // // All Active Directory objects:
        // // Note: We use 'paginate' here so over 1000 results can be returned.
        // $objects = \LdapRecord\Models\ActiveDirectory\Entry::paginate();

        // // All Active Directory users:
        // $users = \LdapRecord\Models\ActiveDirectory\User::get();

        // // All Active Directory contacts:
        // $contacts = \LdapRecord\Models\ActiveDirectory\Contact::get();

        // // All Active Directory groups:
        // $groups = \LdapRecord\Models\ActiveDirectory\Group::get();

        // // All Active Directory organizational units:
        // $ous = \LdapRecord\Models\ActiveDirectory\OrganizationalUnit::get();

        // // All Active Directory printers:
        // $printers = \LdapRecord\Models\ActiveDirectory\Printer::get();

        // // All Active Directory computers:
        // $computers = \LdapRecord\Models\ActiveDirectory\Computer::get();

        // // All foreign security principals:
        // $foreignPrincipals = \LdapRecord\Models\ActiveDirectory\ForeignSecurityPrincipal::get();

        // dd($printers);

        Mail::raw('Text to e-mail', function($msg)
        {
            $msg->from(env('MAIL_FROM_ADDR'), 'Laravel');
         
            $msg->to('a.lapin@taraz.2gis.kz')->subject('Test Email');
        });        

        // $data = ['message' => 'This is a test!'];
        // Mail::to('a.lapin@taraz.2gis.kz')->send(new TestEmail($data));
    }
}
