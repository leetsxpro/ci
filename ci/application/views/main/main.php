<script>
function check0(){
	if(!document.form0.id.value){
		alert("id를 입력해 주세요.");
		return false;
	}

	if(!document.form0.pw.value){
		alert("비밀번호를 입력해 주세요.");
		return false;
	}
}
</script>
<?php
if(isset($cookie)){
?>
<button type="button">게시판</button>
<button type="button" onclick="window.location.href='/ci/main/logout_proc'">로그아웃</button>
<?php
}else{
?>
<form name="form0" action="/ci/main/login_proc" method="post" onsubmit="return check0()">
	<table>
		<tr>
			<td><label for="input_id">아이디</label></td>
			<td><input type="text" name="id" id="input_id"></td>
		</tr>
		<tr>
			<td><label for="input_pw">비밀번호</label></td>
			<td><input type="password" name="pw" id="input_pw"></td>
		</tr>
	</table>
	<button type="submit">로그인</button>
	<button type="button" onclick="window.location.href='/ci/main/join'">회원가입</button>
</form>
<?php
}
?>
<div></div>