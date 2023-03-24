<?php
class RankingTable
{
    public $users = null;
    public function recordResult($user, $points)
    {
        foreach ($this->users as $item) {
            if ($user == $item['username']) {
                $item['score'] += $points;
                echo $item['score'];
                return;
            }
        }
    }

    public function __construct($users)
    {
        foreach ($users as $user) {
            $this->users[] = ['username' => $user, 'score' => 0];
        }
    }
}

$table = new RankingTable(array('Jan', 'Maks', 'Monika'));
$table->recordResult('Jan', 2);
$table->recordResult('Maks', 3);
$table->recordResult('Monika', 5);
// echo $table->playerRank(1); // Monika