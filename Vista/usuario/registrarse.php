<?php
$titulo =".:Registro de usuario :.";
$dir="";
include ($dir."../estructura/header.php");
?>
<div  style="text-align:center;">
<h2>Registro de usuario</h2>
</div>
<div style="margin:20px 0; padding-left:30px;">
	<div class="easyui-panel" title="Registrar Usuario" style="width:100%;max-width:440px;padding:30px 60px; background-size: contain;
   background-position: center center;">
		<form id="ff" class="easyui-form" method="post" data-options="novalidate:true">
			<div style="margin-bottom:20px">
				<input class="easyui-textbox" name="name" style="width:100%" data-options="label:'Usuario:',required:true">
			</div>
			
			<div style="margin-bottom:20px">
				<input class="easyui-textbox" name="subject" style="width:100%" data-options="label:'Password:',required:true">
			</div>
			<div style="margin-bottom:20px">
				<input class="easyui-textbox" name="email" style="width:100%" data-options="label:'Email:',required:true,validType:'email'">
			</div>
			
		</form>
		<div style="text-align:center;padding:5px 0">
			<a href="javascript:void(0)" class="easyui-linkbutton" onclick="submitForm()" style="width:80px">Submit</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()" style="width:80px">Clear</a>
		</div>
	</div>

	</div>
	<script>
		function submitForm(){
			$('#ff').form('submit',{
				onSubmit:function(){
					return $(this).form('enableValidation').form('validate');
				}
			});
		}
		function clearForm(){
			$('#ff').form('clear');
		}
	</script>
	
	</div>
<?php 
include ($dir."../estructura/footer.php");


?>