import {Component, OnInit} from '@angular/core';
import {Router} from '@angular/router';
import {ActivatedRoute, Params} from '@angular/router';

import {isEmpty, isArrayLike} from 'lodash';

import {Observable} from 'rxjs/Observable';
import 'rxjs/add/observable/of';
import 'rxjs/add/operator/mergeMap';

import {PageService} from './shared/template.service';
import {SettingsService} from '../shared/settings.service';
import {CategoryService} from '../shared/category.service';
import { PostModel } from '../posts/shared/post.model';

@Component({
    templateUrl: './template.component.html',
    providers: [ PageService ]
})

export class TemplateComponent implements OnInit {
    params: Params;
    slug: string;
    template: string;
    page: PostModel;
    isHomePage = false;

    constructor(private router: Router,
                private activatedRoute: ActivatedRoute,
                private pageService: PageService,
                private settingsService: SettingsService,
                private categoryService: CategoryService) {}

    ngOnInit() {
        this.activatedRoute.params.mergeMap(params => {
            this.params = params;
            this.slug = params.slug;
            return this.settingsService.getSettings();
        }).mergeMap(settings => {
            if (!this.slug || this.slug === undefined || this.params.page_index) {
                this.isHomePage = true;
                return this.pageService.getPageById(+settings.page_on_front, true);
            }else {
                return this.pageService.getPage(this.slug);
            }
        }).mergeMap(page => {
            if (!isEmpty(page)) {
                this.template = !isEmpty(page.template) ? page.template : 'plain-template.php';
                this.page = page[0];
                this.page = isArrayLike(page) ? page[0] : page;

                return Observable.of(page).map(result => result as any);
            }else {
                this.isHomePage = false;
                return this.categoryService.getCategoryByRouter(this.slug).map(result => result as any);
            }
        })
        .subscribe(result => {
            result = isArrayLike(result) && result.length > 0 ? result[0] : result;

            if (isEmpty(result) && !this.template) {
                this.router.navigate(['/error/404']);
            }else if (result && (typeof result.taxonomy !== 'undefined' && result.taxonomy === 'category')) {
                        this.template = 'template-post-list.php';
            }else if (result && this.template
                && (result.content !== undefined && result.content.protected === true) ) {
                    this.router.navigate(['/error/403']);
            }
        });
    }
 }
