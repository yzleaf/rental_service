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

//�رմ���
function closewin() {
//�رմ�������ҳ��ʾ�ر���Ϣ
  window.opener = "";
  window.close();
}

//��������ַ����Ƿ�Ϊ����
//����˵�������������Ķ���
//����ֵ��1-������,0-������
function isNum(vid, obj) {
  re=new RegExp("[^0-9]");
  var s;
  var i_value=document.getElementById(obj).value;
  if(s=i_value.match(re)) {
    alert("'"+vid+"' �к��зǷ��ַ� '"+s+"'��");
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

//��ѡ����ת
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
  


