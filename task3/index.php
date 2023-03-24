<?php
class RankingTable
{
    public $users = null;
    public function recordResult($user, $points)
    {
        foreach ($this->users as $index => $item) {
            if ($user == $item['username']) {
                $this->users[$index]['score'] += $points;
                $this->users[$index]['games']++;
                return;
            }
        }
    }

    public function playerRank($rank)
    {
        // in case of much bigger count of elements should be used quick sort
        usort($this->users, function ($a, $b) {
            $score = $b['score'] - $a['score'];
            if ($score == 0)
                $score = $a['games'] - $b['games'];
            return $score;
        });
        return $this->users[$rank - 1]['username'];
    }

    public function __construct($users)
    {
        foreach ($users as $user) {
            $this->users[] = ['username' => $user, 'score' => 0, 'games' => 0];
        }
    }
}



$table = new RankingTable(array('Jan', 'Maks', 'Monika'));

$table->recordResult('Jan', 2);
$table->recordResult('Maks', 3);
$table->recordResult('Monika', 5);
echo $table->playerRank(1);
