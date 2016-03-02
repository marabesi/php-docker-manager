<?php

namespace AppBundle\Service;

class GitBranchFilter
{

    public function find($repository)
    {
        $matches = [];

        preg_match_all('/\/+.*/', $repository, $matches);

        if (count($matches[0] > 0)) {

            array_walk($matches[0], function(&$value) {
                $value = str_replace('/heads/', '', $value);
            });

            return $matches[0];
        }

        return [];
    }
}