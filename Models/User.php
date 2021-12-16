<?php 
namespace IDGdashboard\Models;

/*
 * File: User.php
 * Project: Models
 * Created Date: We Dec 2021
 * Author: Ayatulloh Ahad R
 * Email: ayatulloh@indiega.net
 * Phone: 085791555506
 * -----
 * Last Modified: Fri Dec 03 2021
 * Modified By: Ayatulloh Ahad R
 * -----
 * Copyright (c) 2021 Indiega Network
 * -----
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------
 */


use Faker\Generator;
use CodeIgniter\Model;
use Ramsey\Uuid\Uuid;

class User extends Model {

    protected $table            = 'users';
    protected $primaryKey       = 'id';

    protected $useAutoIncrement = true;

    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;

    protected $allowedFields    = [
        'username',
        'password',
        'email',
        'activation_code',
        'forgotten_password_code',
        'forgotten_password_time',
        'remember_code',
        'active',
        'fullname',
        'phone',
        'address',
        'picture',
        'uuid',
    ];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];
    protected $beforeFind   = ['countAllResultSQL'];


    /** 
     * 
    */
    public function authData(){
        $authenticateUserID = $this->authID();
        return $this->find($authenticateUserID);
    }

    /** 
     * 
    */
    public function authID(){
        return (INT) session('user_id');
    }

    /** 
     * membuat fungsi untuk menampilkan user avatar
    */
    public function avatar($filename = 'null', $attributes = null )
    {
        $image_path = ROOTPATH . 'public/uploads/users/';

        if( ! file_exists( $image_path . $filename ) ){
            $filename     = 'no-images.jpg'; 
        }

        $attribute = '';
        if( is_array($attributes) )
            foreach ($attributes as $key => $value) {
                $attribute .= $key . '="'. $value .'"';
            }

        $output     = '/uploads/users/' . $filename;
        return '<img src="'.$output.'" '.$attribute.' />';
    }

    //for development only
    public function fake(Generator &$faker)
    {
        
		$uuid       = Uuid::uuid4();
        $username   = $faker->firstName();

        return [
            'username'  => $username,
            'password'  => $username,
            'email'     => $faker->email(),
            'active'    => 1,
            'fullname'  => $faker->name(),
            'phone'     => $faker->e164PhoneNumber(),
            'address'   => $faker->address(),
            'picture'   => \Faker\Provider\Image::imageUrl(800, 400),
            'uuid'      => $uuid,
            
        ];
    }

    /** 
     * fungsi ini akan membuat field password akan selalu di encrypt ketika INSERT atau UPDATE
    */
    protected function hashPassword(array $data)
    {
        if (! isset($data['data']['password'])) return $data;
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_BCRYPT);
        return $data;
    }

    protected function countAllResultSQL(){
        $this->from('(select count(id) as total_table_rows from users) as u2');
    }

}