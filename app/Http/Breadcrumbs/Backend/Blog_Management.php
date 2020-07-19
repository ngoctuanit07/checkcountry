<?php

Breadcrumbs::register('admin.website.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('website.backend.website.management'), route('admin.website.index'));
});

Breadcrumbs::register('admin.website.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.website.index');
    $breadcrumbs->push(trans('website.backend.website.create'), route('admin.website.create'));
});

Breadcrumbs::register('admin.website.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.website.index');
    $breadcrumbs->push(trans('website.backend.website.edit'), route('admin.website.edit', $id));
});
