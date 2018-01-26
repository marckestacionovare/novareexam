<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $fname = $_POST['fname'];
        // $lname = $_POST['lname'];
        // $address = $_POST['address'];
        // $postcode = $_POST['postcode'];
        // $contactnum = $_POST['contactnum'];
        // $email = $_POST['email'];
        // $username = $_POST['username'];
        // $password = $_POST['password'];

        DB::table('user_account_table')->insert(
		    [
		    	'fname' => $_POST['fname'],
				'lname' => $_POST['lname'],
				'address' => $_POST['address'],
				'postcode' => $_POST['postcode'],
				'contactnum' => $_POST['contactnum'],
				'email' => $_POST['email'],
				'username' => $_POST['username'],
				'password' => $_POST['password']
		    ]
		);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$tempHash = '12345';

		if ($tempHash === $_POST['hash']) {
			// echo 'go';
			$record = DB::table('user_account_table')->where('id', $_POST['id'])->first();
			$toUpdate = array(
				'id' => $record->id,
				'fname' => $record->fname,
				'lname' => $record->lname,
				'address' => $record->address,
				'postcode' => $record->postcode,
				'contactnum' => $record->contactnum,
				'email' => $record->email,
				'username' => $record->username,
				'password' => $record->password
			);

			$jsonResult = json_encode($toUpdate);
			return $jsonResult;
		} else {
			// echo 'error';
		}
    }

    /**
     * Display all the records.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_all()
    {
        $records = DB::table('user_account_table')->get();
        return json_encode($records);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
    	// var_dump($_POST);

    	$toUpdateRecords = array('fname' => $_POST['fname'],
            		'lname' => $_POST['lname'],
            		'address' => $_POST['address'],
            		'postcode' => $_POST['postcode'],
            		'contactnum' => $_POST['contactnum']);

        if (!empty($_POST['password']) && !empty($_POST['cpassword'])) { $toUpdateRecords['password'] = $_POST['password']; }

    	// DB::table('user_account_table')
     //        ->where('id', $_POST['userID'])
     //        ->update(
     //        	[
     //        		$toUpdateRecords
     //        	]);

    	// if ($_POST['password'] === $_POST['cpassword']) {
    		DB::table('user_account_table')
            ->where('id', $_POST['userID'])
            ->update(
            	[
            		'fname' => $_POST['fname'],
            		'lname' => $_POST['lname'],
            		'address' => $_POST['address'],
            		'postcode' => $_POST['postcode'],
            		'contactnum' => $_POST['contactnum'],
            		'password' => $_POST['password']
            	]);
    	// } else {
    	// 	DB::table('user_account_table')
     //        ->where('id', $_POST['userID'])
     //        ->update(
     //        	[
     //        		'fname' => $_POST['fname'],
     //        		'lname' => $_POST['lname'],
     //        		'address' => $_POST['address'],
     //        		'postcode' => $_POST['postcode'],
     //        		'contactnum' => $_POST['contactnum'],
     //        	]);
    	// }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	DB::table('user_account_table')->where('id', $id)->delete();
    }

    /**
     * Remove the batch resource from storage.
     *
     * @param  obj/array  $list
     * @return \Illuminate\Http\Response
     */
    public function destroy_all($id)
    {
    	// var_dump($id);

    	foreach (explode(",", $id) as $value) {
    		// echo $value . PHP_EOL;
    		DB::table('user_account_table')->where('id', $value)->delete();
    	}
    }
}
