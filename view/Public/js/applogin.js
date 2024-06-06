
/* tous les javascript dans le login */
const signinbtn=document.querySelector("#signinbtn");
const signupbtn=document.querySelector("#signupbtn");
const loginform=document.querySelector(".loginform");

signupbtn.addEventListener('click',()=>{
  loginform.classList.add("signupmode");
});
signinbtn.addEventListener('click',()=>{
  loginform.classList.remove("signupmode");
}); 