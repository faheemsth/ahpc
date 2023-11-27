<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstituteProgram extends Model
{
    use HasFactory;
    protected $appends = ['dis_name','program_name'];

    protected $fillable = [
        'user_id','discipline_id','program_id','program_status','description','updated_by'
    ];

    public function getDisNameAttribute(){
        $discipline_id = $this->discipline_id;
        $dis = Discipline::where('id',$discipline_id)->first();
        return $dis->discipline_name;
    }

    public function getProgramNameAttribute(){
        $program_id = $this->program_id;
        $prg = Program::where('id',$program_id)->first();
        return $prg->title;
    }

}
