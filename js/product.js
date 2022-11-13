
const form=document.getElementById('form');
const prodName=document.getElementById('prod_name');
const color=document.getElementById('color');
const markedPrice=document.getElementById('marked_price');
const offerPrice=document.getElementById('offer_price');
const description=document.getElementById('description');
const tags=document.getElementById('tags');
var regName = /^[-a-z A-Z,0-9]+$/;
var regPhone = /^[0-9]+$/;

form.addEventListener('submit',(e) => {
  checkInputs(e);
  });

function checkInputs(e)
{
  const prodNameVal=prodName.value;
  const colorVal=color.value;
  const markedPriceVal=markedPrice.value;
  const offerPriceVal=offerPrice.value;
  const descriptionVal=description.value;
  const tagsVal=tags.value;

  if(prodNameVal!=="")
  {
    setSuccessFor(prod_name);
  }
  else{ 
    setErrorFor(prod_name,"Invalid Product Name");
  e.preventDefault();
  }

  if(!isNaN(markedPriceVal))
  {
    setSuccessFor(marked_price);
  }
  else{ 
    setErrorFor(marked_price,"Invalid Marked Price");
  e.preventDefault();
  }

  if(!isNaN(offerPriceVal))
  {
    setSuccessFor(offer_price);
  }
  else{ 
    setErrorFor(offer_price,"Invalid Offer Price");
  e.preventDefault();
  }

  if(colorVal!="")
  {
    setSuccessFor(color);
  }
  else{ 
    setErrorFor(color,"Empty Color");
  e.preventDefault();
  }

  if(descriptionVal!="")
  {
    setSuccessFor(description);
  }
  else{
    setErrorFor(description,"Empty Description");
  e.preventDefault();
  }

  if(tagsVal!="")
  {
    setSuccessFor(tags);
  }
  else{
    setErrorFor(tags,"Empty Tags");
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