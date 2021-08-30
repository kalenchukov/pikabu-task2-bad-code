<?php declare(strict_types = 1);

/**
 * @author Алексей Каленчуков <aleksey.kalenchukov@yandex.ru>
 * @version v1
 */

class Filter
{
	/**
	 * Пользователи
	 */
	private array $users = [];

	/**
	 * Рейтинг
	 */
	private int|float|null $rating = null;

	/**
	 * Имя
	 */
	private string|null $name = null;

	/**
	 * Роль
	 */
	private string|null $role = null;

	function __construct(array $users)
	{
		$this->users = $users;
	}

	/**
	 * Устанавливает фильтр по рейтингу
	 */
	public function setRating(int|float $rating):self
	{
		$this->rating = $rating;

		return $this;
	}

	/**
	 * Устанавливает фильтр по имени
	 */
	public function setName(string $name):self
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Устанавливает фильтр по роли
	 */
	public function setRole(string $role):self
	{
		$this->role = $role;

		return $this;
	}

	/**
	 * Выполняет выборку
	 */
	public function get():array
	{
		$rezult = [];

		foreach ($this->users as $user)
		{
			if (is_object($user) === false)
			{
				throw new Exception('Wrong input arguments');
			}

			if ($user->id > 0)
			{
				if ($this->rating === null || $user->rating >= $this->rating)
				{
					if ($this->name === null || substr_count($user->name, $this->name) > 0)
					{
						if ($this->role === null || in_array($this->role, $user->roles, true))
						{
							$rezult[] = $user;
						}
					}
				}
			}
		}

		return $rezult;
	}
}


$users = [
	(object)[
		'id'		=> '1',
		'rating'	=> 1000,
		'name'		=> 'Цой',
		'roles'		=> ['root']
	],
	(object)[
		'id'		=> 2,
		'rating'	=> '900',
		'name'		=> 'Каспарян',
		'roles'		=> ['admin', 'user']
	],
	(object)[
		'id'		=> '3',
		'rating'	=> '500',
		'name'		=> 'Тихомиров',
		'roles'		=> ['admin', 'moder', 'user']
	],
	(object)[
		'id'		=> 4,
		'rating'	=> 400,
		'name'		=> 'Гурьянов',
		'roles'		=> ['admin', 'moder', 'user']
	]
];

try
{
	$filter = new Filter($users);
	$rezult = $filter
		->setRating(500)
		->setName('Цой')
		->setRole('root')
		->get();

	print_r($rezult);
}
catch (Exception $error)
{
	echo $error->getMessage();
}

?>
