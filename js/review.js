
const form=document.getElementById('form');
const review=document.getElementById('review');
var regex = /^[a-z A-Z,0-9]+$/;

form.addEventListener('submit',(e) => {
  checkInputs(e);
  });

function checkInputs(e)
{
  const reviewVal=review.value;

  if(reviewVal!="")
  {
    setSuccessFor(review);
  }
  else{	
    setErrorFor(review,"Empty Review");
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