<?php
// Verify email address
function verifyEmail($email) {
  $email_pattern = '/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])' .
  '(([a-z0-9-])*([a-z0-9]))+' . '(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i';
  
  return preg_match ($email_pattern, $email);
}
?>