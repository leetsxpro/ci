<script>
$(function(){
	//년도 선택
	year = new Date().getFullYear();
	str = "";
	for(i=year;i>=1900;i--){
		str += "<option value='"+i+"'>"+i+"</option>";
	}
	$("select[name='year']").append(str);

	//월 선택
	str = "";
	for(i=1;i<13;i++){
		if(i > 9){
			str += "<option value='"+i+"'>"+i+"</option>";
		}else{
			str += "<option value='0"+i+"'>0"+i+"</option>";
		}
	}
	$("select[name='month']").append(str);

	//일 선택
	$("select[name='month']").change(function(){
		var v_year = $("select[name='year'] option:selected").val();
		var v_month = $("select[name='month'] option:selected").val();
		
		$("select[name='day']").children("option:not(:first)").remove();
		days = new Date(v_year, v_month, 0).getDate();
		str = "";
		for(i=1;i<=days;i++){
			if(i > 9){
				str += "<option value='"+i+"'>"+i+"</option>";
			}else{
				str += "<option value='0"+i+"'>0"+i+"</option>";
			}
		}
		$("select[name='day']").append(str);
	})
	$("select[name='year']").change(function(){
		var v_year = $("select[name='year'] option:selected").val();
		var v_month = $("select[name='month'] option:selected").val();
		
		$("select[name='day']").children("option:not(:first)").remove();
		days = new Date(v_year, v_month, 0).getDate();
		str = "";
		for(i=1;i<=days;i++){
			if(i > 9){
				str += "<option value='"+i+"'>"+i+"일</option>";
			}else{
				str += "<option value='0"+i+"'>0"+i+"일</option>";
			}
		}
		$("select[name='day']").append(str);
	})
})

//null 값 체크
function check(){
	if($("input[name='id']").val() == ""){
		alert("id를 입력해 주세요");
		return false;
	}
}
</script>

<form action="/ci/main/join_proc" method="post" onsubmit="return check()">
	<table>
		<tr>
			<td><label for="input_id">아이디</label></td>
			<td><input type="text" name="id" id="input_id"></td>
		</tr>
		<tr>
			<td><label for="input_pw">비밀번호</label></td>
			<td><input type="password" name="pw" id="input_pw"></td>
		</tr>
		<tr>
			<td><label for="input_name">이름</label></td>
			<td><input type="text" name="name" id="input_name"></td>
		</tr>
		<tr>
			<td><label for="input_gender">성별</label></td>
			<td>
				<select name="gender" id="input_gender">
					<option value="">선택</option>
					<option value="male">남자</option>
					<option value="female">여자</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>생년월일</td>
			<td>
				<select name="year" id="input_year">
					<option value="">선택</option>
				</select>
				<label for="input_year">년</label>
				<select name="month" id="input_month">
					<option value="">선택</option>
				</select>
				<label for="input_month">월</label>
				<select name="day" id="input_day">
					<option value="">선택</option>
				</select>
				<label for="input_day">일</label>
			</td>
		</tr>
	</table>	
	<button type="submit">가입</button>
	<button type="button" onclick="document.location.href='/ci/main'">취소</button>
</form>