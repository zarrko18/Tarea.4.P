<?php
  // file: controllers/BooksController.php

  

  class BooksController extends Controller {

    public function index() {  
      $users = DB::table('Book')->get();
      return view('book',
       ['books'=> $users
        ]);
    }

    public function show($id) {

      $user = DB::table('Book')->where('id', $id)->first();

     
      return view('books',
        ['books'=>$user,
         'title'=>'books Detail']);
    }

    public function create() {
      return view('Agregar_Book',
        ['title'=>'Books Create']);
    }  
  
    public function store() {
      $title = Input::get('title');
      $edition = Input::get('edition');
      $copyright = Input::get('copyright');
      $pages = Input::get('pages');
      $item = ['title'=>$title,'edition'=>$edition,
               'copyright'=>$copyright,'pages'=>$pages];
       DB::table('Book')->insert($item);
      return redirect('/');
    }  

    public function edit($id) {
      $user = DB::table('Book')->where('id', $id)->first();
      return view('Editar_Book',
        ['books'=>$user,
         'title'=>'Books Edit']);
    }  

    public function update($_,$id) {
      $title = Input::get('title');
      $edition = Input::get('edition');
      $copyright = Input::get('copyright');
      $pages = Input::get('pages');
      $item = ['title'=>$title,'edition'=>$edition,
               'copyright'=>$copyright,'pages'=>$pages];
               DB::table('Book')->update($id,$item);
      return redirect('/');
    }  

    public function destroy($id) {  
      DB::table('Book')->delete($id);
      return redirect('/');
    }
  }
?>