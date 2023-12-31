<?php

namespace App\Http\Livewire;

use Modules\Students\Entities\Student;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination, WithSorting;
    //This refreshes this page automatically
    protected $listeners = ['Students' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'students.first_name';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.students',[
            'students' =>Student::getStudents($this->class_id,$this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
    public function mount($class_id)
    {
        $this->class_id = $class_id;
    }
    /**
     * This function deletes the Students
     */
    public static function deleteStudent($student_id)
    {
        Student::whereId($student_id)->delete();
        session()->flash('success', 'You have successfully deleted user');
    }
}
