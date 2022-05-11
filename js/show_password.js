let showPassword = document.querySelectorAll('.password-checkbox');
showPassword.forEach(item =>
  item.addEventListener('click', toggleType)
);

function toggleType() {
  let input = document.getElementById('password');
  let input_confirm = document.getElementById('password_confirm');
  let input_last = document.getElementById('password_last');
  let input_login = document.getElementById('loginPassword');

  if (input.type == 'password'){input.type = 'text';}else{input.type = 'password';}
  if (input_confirm.type == 'password'){input_confirm.type = 'text';}else{input_confirm.type = 'password';}
  if (input_last.type == 'password'){input_last.type = 'text';}else{input_last.type = 'password';}
  if (input_login.type == 'password'){input_login.type = 'text';}else{input_login.type = 'password';}
}