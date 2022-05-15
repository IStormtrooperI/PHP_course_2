<?php

namespace App\Http\Controllers;
//namespace App\Models;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Staff;
use Illuminate\Support\Facades\Storage;
use File;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        $person=Person::select(['id','FIO','Phone','Stage','Staff','Image'])->where('id',$id)->first();
        $staff=Staff::select(['id','staff'])->where('id',$person->Staff)->first();
        $header = "Резюме и вакансии";
        $message = "message";
        return view('page')->with(['header' => $header, 'message' => $message,'person'=>$person,'staff'=>$staff]);
    }

    public function izb()
    {
        $header = "Резюме и вакансии";
        $message = "message";
        return view('page')->with(['header' => $header, 'message' => $message]);
    }

    public function first()
    {
        $persons = Person::select(['FIO'])->where([['Stage', '>=', 5], ['Stage', '<=', 15]])->get();

        return view('first_stage')->with(['persons' => $persons]);
    }

    public function second()
    {
        $persons = Person::select(['FIO', 'Stage'])->where([['Staff', 1]])->get();

        return view('second')->with(['persons' => $persons]);
    }

    public function third()
    {
        $persons = Person::select()->count();

        return view('third')->with(['persons' => $persons]);
    }

    public function fourth()
    {
        $persons = Person::select(['staff'])->get()->unique('staff');
        $staff = [];

        foreach ($persons as $person) {
            $staff = array_merge($staff, Staff::select(['staff'])->where('id', '=', $person['staff'])->get()->toArray());
        }

        return view('fourth')->with(['staff' => $staff]);
    }

    public function resumeage()
    {
        $persons = Person::select(['FIO','Stage'])->orderBy('Stage')->get();

        return view('resumeage')->with(['persons' => $persons]);
    }

    public function resumestaff()
    {
        $persons = Person::select(['FIO','Stage'])->orderBy('Staff')->get();

        return view('resumestaff')->with(['persons' => $persons]);
    }

    public function delete_resume(Person $person){
        $person->delete();
        return redirect('/show');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff = Staff::all();

        $scan = File::files(public_path() . '/images');
        foreach ($scan as $key => $file) {
            if ($file->getExtension() != 'jpg') {
                unset($scan[$key]);
            }
        }

        return view('add-content')->with(["s" => $staff,'avatars'=>$scan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            ['FIO' => 'required|max:255',
                'Phone' => 'required',
                'Stage' => 'required',
                'Staff' => 'required',
                'Image' => 'required']);
        //dump($request->all());
        $data = $request->all();
        $person = Person::create($data);
        //$resume = new Person;
        //$resume->fill($data);
        //dump($resume);
        // $resume->save();
        return redirect('/add-content');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }


    public function show()
    {
        $persons = Person::select(['id','FIO', 'Phone', 'Stage'])->get();

        return view('resume')->with(['persons' => $persons]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
