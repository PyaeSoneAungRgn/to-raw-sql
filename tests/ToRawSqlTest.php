<?php

it('can execute toRawSql', function () {
    expect(
        users()
            ->where('votes', '>', 100)
            ->orWhere(function ($query) {
                $query->where('name', 'Abigail')
                    ->where('votes', '>', 50);
            })
            ->toRawSql()
    )->toBe("select * from `users` where `votes` > 100 or (`name` = 'Abigail' and `votes` > 50)");
});
