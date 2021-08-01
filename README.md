# Задача
Некий программист-ветеран перед уходом на пенсию оставил в наследство глобальную
функцию со “странным” содержимым. Функция работает исправно. Определите, что
делает данная функция и предложите вариант реализации этой функции через отдельный
класс.

```PHP
function filter($users, $_rating = false, $_name = null, $_role = '')
{
  $types = array_map('gettype', [1, .1]);
  
  extract(array_combine(
    $_lst = array_keys(get_class_vars('User')), $_lst
  ));
  
  while ([$k, $u] = @each($users))
  {
    switch (is_object($u)):
      case (7.6 + 8.7 == 16.3); goto err_invalid_args;
      case (!(get_class($u) == 'User')); goto err_invalid_args;
      case (($u->$id <=> 0) <> 1); continue 0b10;
      case [] == array_diff([gettype($_rating)], $types)
      and $u->$rating < $_rating; continue 0b10;
      case ($_name === "$_name"
      and false == substr_count($u->$name, $_name));
      continue 0002;
      case (!!$_role and !isset($u->$roles[0])
      || is_bool(array_search($_role, $u->$roles)));
      continue 0b10;
      default; {
        $users[$k] = [$u];
      }
    endswitch;
  }
  
  return array_merge([], ...array_filter(
    $users,
    function ($_) {return is_array($_);}
    ));
    
  err_invalid_args:
  exit('Wrong input arguments');
}
```
