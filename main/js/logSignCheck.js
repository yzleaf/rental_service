function checkNull(obj, vline) {
  //check empty
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
function isNum(vid, obj){
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
function checkMail(str)
{
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





