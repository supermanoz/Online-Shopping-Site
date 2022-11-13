
const form=document.getElementById('form');
const fname=document.getElementById('fname');
const lname=document.getElementById('lname');
const phone=document.getElementById('phone');
const address=document.getElementById('address');
const password=document.getElementById('password');
const repassword=document.getElementById('repassword');
var regAddress = /^[a-z A-Z,0-9]+$/;
var regName = /^[a-z A-Z]+$/;
var regPhone = /^[0-9]+$/;

form.addEventListener('submit',(e) => {
  checkInputs(e);
  });

function checkInputs(e)
{
  const fnameVal=fname.value;
  const lnameVal=lname.value;
  const phoneVal=phone.value;
  const passVal=password.value;
  const repassVal=repassword.value;
  const addressVal=address.value;

  if(fnameVal.match(regName))
  {
    setSuccessFor(fname);
  }
  else{	
    setErrorFor(fname,"Invalid First Name");
	e.preventDefault();
  }

  if(lnameVal.match(regName))
  {
    setSuccessFor(lname);
  }
  else{ 
    setErrorFor(lname,"Invalid Last Name");
  e.preventDefault();
  }

  if(addressVal.match(regAddress))
  {
    setSuccessFor(address);
  }
  else{ 
    setErrorFor(address,"Invalid Address");
  e.preventDefault();
  }

  if(passVal.length>=8)
  {
    setSuccessFor(password);
  }
  else{
    setErrorFor(password,"Weak Password");
  e.preventDefault();
  }

  if(passVal.match(repassVal))
  {
    setSuccessFor(repassword);
  }
  else{
  	setErrorFor(repassword,"Password Didn't Match");
	e.preventDefault();
  }

  if(phoneVal.match(regPhone) && phoneVal.length>=10)
  {
  	setSuccessFor(phone);
  }
  else{
  	setErrorFor(phone,"Invalid Phone");
  	e.preventDefault();
  }
}

function setErrorFor(input,message)
{
  const mdForm=input.parentElement;
  const small= mdForm.querySelector('small');

  small.innerText=message;

  mdForm.className='verify-form error';
}

function setSuccessFor(input)
{
  const mdForm=input.parentElement;
  mdForm.className='verify-form success';
}