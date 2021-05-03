<?php
  // file: controllers/BooksController.php



  class publisherController extends Controller {

    public function index() {  
      $users = DB::table('Publisher')->get();
      return view('publisher',
       ['publisher'=>$users
        ]);
    }

    public function show($id) {
      $prof = DB::table('Publisher')->where('id', $id)->first();
      return view('publisher',
        ['publisher'=>$prof,
         'title'=>'author Detail']);
    }

    public function create() {
      return view('Agregar_Publisher',
        ['title'=>'author Create']);
    }  
  
    public function store() {
      $name = Input::get('name');
      $country = Input::get('country');
      $founded = Input::get('founded');
      $genere = Input::get('genere');
      $item = ['name'=>$name,'country'=>$country,
               'founded'=>$founded,'genere'=>$genere];
               DB::table('Publisher')->insert($item);
      return redirect('/list_Publisher');
    }  

    public function edit($id) {
      $prof = DB::table('Publisher')->where('id', $id)->first();
      return view('Editar_Publisher',
        ['publisher'=>$prof,
         'title'=>'Books Edit']);
    }  

    public function update($_,$id) {
      $name = Input::get('name');
      $country = Input::get('country');
      $founded = Input::get('founded');
      $genere = Input::get('genere');
      $item = ['name'=>$name,'country'=>$country,
               'founded'=>$founded,'genere'=>$genere];
               DB::table('Publisher')->update($id,$item);
      return redirect('/list_Publisher');
    }  

    public function destroy($id) {  
      DB::table('Publisher')->delete($id);
      return redirect('/list_Publisher');
    }
  }
?>