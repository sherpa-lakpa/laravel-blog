@extends('admins.main')

@section('title','| Profile')

@section('stylesheet')

<!-- added to overcome bootstrap load fail -->
<!-- Bootstrap Core CSS -->
<link href="../admins/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../admins/css/sb-admin.css" rel="stylesheet">


<!-- Custom Fonts -->
<link href="../admins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


@endsection

@section('content')
<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header" style="text-align: center;">
		Profile <i class="fa fa-user"></i> 
		</h1>
	</div>
</div>
<!-- /.row -->

<div class="row">
	<div class="col-md-9 col-md-offset-1"  style="word-wrap: break-word">
		<div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">{{ $user->name }}<a href="{{ route('users.edit', $user->id) }}" class="btn btn-default btn-md" style="background: rgba(255,255,255,0.2);margin-left: 10px;">Edit</a></h3>
    </div>

    <div class="panel-body">
      <div class="row">
        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($user->email)))."?d=wavatar" }}" class="img-circle img-responsive" width="100" height="100"> </div>
        <div class=" col-md-9 col-lg-9 "> 
          <table class="table table-user-information">
            <tbody>
              <tr>
                <td>Specialist at:</td>
                <td>
                @foreach($user->skills as $skill)
					       <span class="label label-warning">{{ $skill["name"] }}</span> 
                @endforeach       
                </td>
              </tr>
              <tr>
                <td>Member Since:</td>
                <td>{{ $user->created_at }}</td>
              </tr>
              <tr>
                <td>Date of Birth</td>
                <td>{{ $user->birth }}</td>
              </tr>
           
                 <tr>
                     <tr>
                <td>Gender</td>
                <td>{{ $user->gender }}</td>
              </tr>
                <tr>
                <td>Home Address</td>
                <td>{{ $user->home }}</td>
              </tr>
              <tr>
                <td>Email</td>
               <!-- <td contenteditable="true" onBlur="saveToDatabase(this,'fname','<?php echo ''; ?>')" onClick="showEdit(this);"><a href="{{ $user->email }}">{{ $user->email }}</td> -->
                <td><a href="{{ $user->email }}">{{ $user->email }}</a></td>
              </tr>
                <td>Last Updated</td>
                <td>{{ $user->updated_at }}
                </td>                        
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
   </div>

</div>
@endsection

@section('scripts')

<!-- <script>
  function showEdit(editableObj) {
    $(editableObj).css("background","rgba(0,0,0,0.7)");
  } 
  
  function saveToDatabase(editableObj,column,id) {
    $(editableObj).css("background","rgba(0,0,0,0.4) url(pp/loaderIcon.gif) no-repeat right");
    $.ajax({
      url: "manage.students.php",
      type: "POST",
      data:'column='+column+'&editval='+editableObj.innerHTML+'&sid='+id,
      success: function(data){
        $(editableObj).css("background","rgba(0,0,0,0.2)");
      }        
     });
  }
</script>
 -->
<!-- jQuery -->
<script src="../admins/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../admins/js/bootstrap.min.js"></script>

@endsection