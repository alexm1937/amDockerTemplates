<?php

declare(strict_types=1);

/**
 * Class User
 *
 * Represents a simple user.
 */
class User {
    private string $name;
    private int $age;

    /**
     * User constructor.
     *
     * @param string $name
     * @param int $age
     */
    public function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * Get the user's name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Get the user's age.
     *
     * @return int
     */
    public function getAge(): int {
        return $this->age;
    }
}

/**
 * Greet a user.
 *
 * @param User $user
 * @return string
 */
function greet(User $user): string {
    return "Hello, " . $user->getName() . "! You are " . $user->getAge() . " years old.";
}

// Test the functionality
$user = new User("Alice", 30);
echo greet($user);

$host = getenv('DB_HOST');
$db   = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    echo "✅ Connected to DB successfully!";
} catch (PDOException $e) {
    echo "❌ DB connection failed: " . $e->getMessage();
}


phpinfo();
