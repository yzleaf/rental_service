//check empty
function checkNull(obj, vline) {
  var v=document.getElementById(obj).value;
  v=v.replace(/(^\s*)|(\s*$)/g,"");
  if (v.length==0){
    document.getElementById('mess_total').innerHTML = "There are empty messages!";
    return false;
  } else {
    document.getElementById('mess_total').innerHTML = "";
    return true;
  }
}

//关闭窗口
function closewin() {
//关闭窗体无网页提示关闭信息
  window.opener = "";
  window.close();
}

//检查输入字符串是否为数字
//参数说明：数据项，输入的对象
//返回值：1-是数字,0-非数字
function isNum(vid, obj) {
  re=new RegExp("[^0-9]");
  var s;
  var i_value=document.getElementById(obj).value;
  if(s=i_value.match(re)) {
    alert("'"+vid+"' 中含有非法字符 '"+s+"'！");
    return 0;
  }
  return 1;
}

//check phone
function checkPhone(str) {
  var Str=document.getElementById(str).value;
  RegularExp=/^[0-9]{10}$/
  if (RegularExp.test(Str)) {
    document.getElementById('mess_phone').innerHTML = "";
    return true;
  } else {
    document.getElementById('mess_phone').innerHTML = "The phone format is invalid! Length must be 10";
    return false;
  }
}

//check email
function checkMail(str) {
  var Str=document.getElementById(str).value;
  RegularExp = /[a-z0-9]*@[a-z0-9]*\.[a-z0-9]+/gi
  if (RegularExp.test(Str)) {
    document.getElementById('mess_email').innerHTML = "";
    return true;
  } else {
    document.getElementById('mess_email').innerHTML = "The email format is invalid!";
    return false;
  }
}

//check zip code
function checkZipCode(str) {
  var Str=document.getElementById(str).value;
  RegularExp=/^[0-9]{5}$/
  if (RegularExp.test(Str)) {
    document.getElementById('mess_zip').innerHTML = "";
    return true;
  } else {
    document.getElementById('mess_zip').innerHTML = "The zip code format is invalid! Length must be 5";
    return false;
  }
}

//单选框跳转
function checkOptions() {
  var radio = document.getElementsByName("options");
  var a = document.getElementById("link");
  console.log(radio);
  if (radio[0].checked==true && radio[1].checked==false) {
    a.href = "signupIndi.php";
  } 
  else if (radio[0].checked==false && radio[1].checked==true) {
    a.href = "signupCorp.php";
  }
}
  


