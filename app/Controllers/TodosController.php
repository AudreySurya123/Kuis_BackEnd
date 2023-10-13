<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\TodosModel;

class TodosController extends BaseController {
    protected $todos;

    public function __construct(){
        $this->todos = new TodosModel();
    }

    public function getTodos(){
        // Mengambil daftar todos dari model dan menampilkannya di tampilan
        $data['todos'] = $this->todos->findAll();
        return view('todo_index', $data);
    }

    public function createTodo(){
        // Mendapatkan data dari inputan form
        $data=[
            "todo" => $this->request->getPost('todo'),
            "deadline" => $this->request->getPost('deadline')
        ];
        
        // Memanggil model untuk menyimpan data
        $this->todos->insert($data);

        // Redirect ke halaman daftar todos
        return redirect()->to('/todos');
    }

    public function deleteTodo($id){
        $todo = $this->todos->find($id);
    
        if ($todo) {
            $this->todos->delete($id);
    
            return redirect()->to('/todos')->with('status', 'Todo deleted successfully');
        } else {
            return redirect()->to('/')->with('error', 'Todo not found');
        }
    }
}
