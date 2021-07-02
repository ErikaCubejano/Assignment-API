<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
</head>
<body>
    <form action ="{{route('student.update', $editStudentng)}}" method="post">
        {{-- <form action=""> --}}
        @csrf
        @method('PUT')

        <div class="col-3">
            <div class="form-group">
              <label for="name">Name</label>
              <input class="form-control" name="name" id="name"  rows="5" value="{{$editStudentng['name']}}">
            </div>
            <div class="form-group">
              <label for="grade">Grade</label>
              <input class="form-control" name="grade" id="grade" value="{{$editStudentng['grade']}}" rows="5">
            </div>
            
        </div> 
        <button type = "submit" class="btn btn-md btn-primary mt-3">Save Changes</button>
   
      </form>
</body>
</html>

