<h1>Add admin</h1>

<form method = "POST" action ="/admin/add">

AdminName<textarea name="AdminName"></textarea>
<br/>
Password
<textarea name="Password"></textarea>
<button type = "submit">Update</button>

{!! csrf_field() !!}
</form>
