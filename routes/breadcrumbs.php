<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('intern.dashboard'));
});

Breadcrumbs::for('mitglieder', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Mitglieder', route('intern.user.index'));
});

Breadcrumbs::for('mitglied-erstellen', function ($trail) {
    $trail->parent('mitglieder');
    $trail->push('Mitglied erstellen', route('intern.user.create'));
});

Breadcrumbs::for('mitglied-show', function ($trail, $user) {
    $trail->parent('mitglieder');
    $trail->push($user->vorname.' '.$user->nachname, route('intern.user.show', $user->id));
});

Breadcrumbs::for('mitglied-edit', function ($trail, $user) {
    $trail->parent('mitglied-show', $user);
    $trail->push('Mitglied bearbeiten', route('intern.user.edit', $user->id));
});

Breadcrumbs::for('rollen', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Rollen', route('intern.role.index'));
});

Breadcrumbs::for('rollen-erstellen', function ($trail) {
    $trail->parent('rollen');
    $trail->push('Rollen erstellen', route('intern.role.create'));
});

Breadcrumbs::for('rollen-show', function ($trail, $role) {
    $trail->parent('rollen');
    $trail->push($role->name, route('intern.role.show', $role->id));
});

Breadcrumbs::for('rollen-bearbeiten', function ($trail, $role) {
    $trail->parent('rollen-show', $role);
    $trail->push('Rollen bearbeiten', route('intern.role.edit', $role->id));
});

Breadcrumbs::for('antrag', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Antrag', route('intern.antrag.index'));
});

Breadcrumbs::for('antrag-show', function ($trail, $antrag) {
    $trail->parent('antrag');
    $trail->push($antrag->vorname.' '.$antrag->nachname, route('intern.antrag.show', $antrag->id));
});

Breadcrumbs::for('team', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Team Übersicht', route('intern.team.index'));
});

Breadcrumbs::for('team-show', function ($trail, $team) {
    $trail->parent('team');
    $trail->push($team->vorname.' '.$team->nachname, route('intern.team.show', $team->id));
});

Breadcrumbs::for('team-edit', function ($trail, $team) {
    $trail->parent('team');
    $trail->push('Teammitglied Bearbeiten', route('intern.team.edit', $team->id));
});

Breadcrumbs::for('telefonliste', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Kontaktmöglichkeiten', route('intern.telefonliste.index'));
});

Breadcrumbs::for('geburtstagsliste', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Geburtstagsliste', route('intern.geburtstagsliste.index'));
});

Breadcrumbs::for('satzung', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Satzung', route('intern.satzung.index'));
});

Breadcrumbs::for('miete', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Miete Übersicht', route('intern.miete.index'));
});

Breadcrumbs::for('zahlung', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Zahlung Übersicht', route('intern.zahlung.index'));
});
