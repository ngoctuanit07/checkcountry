<?php

Breadcrumbs::register('admin.websites.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.websites.management'), route('admin.websites.index'));
});

Breadcrumbs::register('admin.websites.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.websites.index');
    $breadcrumbs->push(trans('menus.backend.websites.create'), route('admin.websites.create'));
});

Breadcrumbs::register('admin.websites.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.websites.index');
    $breadcrumbs->push(trans('menus.backend.websites.edit'), route('admin.websites.edit', $id));
});
