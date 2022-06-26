<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveQuestionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
//            "questions.*.question"=>["required"],
//            "questions.*.answer"=>["required"],
//            "paragraph_id"=>["required","numeric"],
        ];
    }
}
/*sample payload
{
   "questions":[
      {
         "question":"test",
         "answer":"sdsada"
      },
      {
         "question":"test 1",
         "answer":"sdsd"
      }
   ],
   "paragraph_id":144
}
*/
