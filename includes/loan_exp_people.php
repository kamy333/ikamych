<?php

/** Resolve the table scope independently of the legacy single-person default. */
function loan_exp_people_selection(array $request, array $people, $isAdmin, $defaultPersonId)
{
    $value = $request['person_id'] ?? $defaultPersonId;
    $value = is_scalar($value) ? (string) $value : '';
    $mode = $isAdmin && in_array($value, ['all', 'selected'], true) ? $value : 'single';
    $known = [];
    foreach ($people as $person) {
        $known[(int) $person['id']] = $person;
    }

    if (!$isAdmin || $mode === 'single') {
        $ids = [(int) $defaultPersonId];
    } elseif ($mode === 'all') {
        $ids = array_keys($known);
    } else {
        $requested = $request['person_ids'] ?? [];
        $ids = [];
        foreach (is_array($requested) ? $requested : [] as $id) {
            $id = is_scalar($id) ? filter_var($id, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) : false;
            if ($id !== false && isset($known[$id])) {
                $ids[$id] = $id;
            }
        }
        $ids = array_values($ids);
    }

    $names = [];
    foreach ($ids as $id) {
        if (isset($known[$id])) {
            $names[] = $known[$id]['person_name'];
        }
    }

    return [
        'mode' => $mode,
        'value' => $mode === 'single' ? (string) $defaultPersonId : $mode,
        'ids' => $ids,
        'title' => $mode === 'all' ? 'All people' : (count($names) > 3 ? count($names) . ' selected people' : implode(' + ', $names)),
        'invalid' => $mode === 'selected' && !$ids,
    ];
}

/** Use placeholders for every selected account, including historical accounts. */
function loan_exp_people_where(array $selection, array $balances, $excludeZero, array &$params, &$types)
{
    $ids = $selection['ids'];
    if ($excludeZero) {
        $ids = array_values(array_filter($ids, function ($id) use ($balances) {
            return round($balances[$id] ?? 0, 2) != 0.0;
        }));
    }
    if (!$ids) {
        return ' WHERE 1=0 ';
    }
    foreach ($ids as $id) {
        $params[] = $id;
        $types .= 'i';
    }
    return ' WHERE t1.person_id IN (' . implode(',', array_fill(0, count($ids), '?')) . ') ';
}

function loan_exp_people_hidden_inputs(array $selection)
{
    $html = '<input type="hidden" name="person_id" value="' . h($selection['value']) . '">';
    if ($selection['mode'] === 'selected') {
        foreach ($selection['ids'] as $id) {
            $html .= '<input type="hidden" name="person_ids[]" value="' . h($id) . '">';
        }
    }
    return $html;
}
