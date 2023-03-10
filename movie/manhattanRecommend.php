<?php

class manhattanRecommend
{
    //实现推荐
    public function recommend($username, $users)
    {
        //获得最近用户的name
        $nearest = $this->computeNearestNeighbor($username, $users);
        $nearest = $nearest['1']['user'];
        $recommendations = array();
        //得到最近用户的推荐列表
        $neighborRatings = $users[$nearest];
        if ($this->checkArray($neighborRatings)) {
            $usernameAction = $users[$username];
            foreach ($neighborRatings as $name => $code) {
                //读取自己没有的
                if (!isset($usernameAction[$name])) {
                    $recommendations[] = ['name' => $name, 'score' => $code];
                }
            }
        }
        $this->sortArrByField($recommendations, 'score', true);
        return $recommendations;
    }

    //计算曼哈顿距离
    private function manhattan($rate1, $rate2)
    {
        $distance = 0;
        if ($this->checkArray($rate1)) {
            foreach ($rate1 as $name => $value1) {
                if (isset($rate2[$name])) {
                    $value2 = $rate2[$name];
                    $distance += abs($value1 - $value2);
                }
            }
        } else {
            $distance = -1;
        }
        return $distance;
    }

//返回最近距离用户
    private function computeNearestNeighbor($username, $users)
    {
        $distances = array();
        if ($this->checkArray($users)) {
            foreach ($users as $key => $user) {
                if ($key == $username) {
                    continue;
                }
                $distance = $this->manhattan($user, $users[$username]);
                $data = array(
                    'user' => $key,
                    'distance' => $distance,
                );
                $distances[] = $data;
            }
        }
        $this->sortArrByField($distances, 'distance', false);
        return $distances;
    }

    /**
     * @param $array
     * @return bool
     * 检查数组有效性
     */
    private function checkArray($array)
    {
        if (is_array($array) && count($array) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $array
     * @param $field
     * @param bool $desc
     * 根据数组的某个值进行排序
     */
    private function sortArrByField(&$array, $field, $desc = false)
    {
        $fieldArr = array();
        foreach ($array as $k => $v) {
            $fieldArr[$k] = $v[$field];
        }
        $sort = $desc == false ? SORT_ASC : SORT_DESC;
        array_multisort($fieldArr, $sort, $array);
    }
}