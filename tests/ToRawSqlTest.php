<?php

it('can execute toRawSql from eloquent builder', function () {
    expect(
        users()
            ->where('votes', '>', 100)
            ->orWhere(function ($query) {
                $query->where('name', 'Abigail')
                    ->where('votes', '>', 50);
            })
            ->where(
                'created_at',
                now()
                    ->setYear(2023)
                    ->setMonth(02)
                    ->setDay(10)
                    ->setHour(13)
                    ->setMinute(22)
                    ->setSecond(38)
            )
            ->toRawSql()
    )->toBe("select * from `users` where `votes` > 100 or (`name` = 'Abigail' and `votes` > 50) and `created_at` = '2023-02-10 13:22:38'");
});

it('can execute toRawSql from query builder', function () {
    expect(
        usersTbl()
            ->where('votes', '>', 100)
            ->orWhere(function ($query) {
                $query->where('name', 'Abigail')
                    ->where('votes', '>', 50);
            })
            ->where(
                'created_at',
                now()
                    ->setYear(2023)
                    ->setMonth(02)
                    ->setDay(10)
                    ->setHour(13)
                    ->setMinute(22)
                    ->setSecond(38)
            )
            ->where('active', true)
            ->toRawSql()
    )->toBe("select * from `users` where `votes` > 100 or (`name` = 'Abigail' and `votes` > 50) and `created_at` = '2023-02-10 13:22:38' and `active` = true");
});
