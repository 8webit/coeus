import { Location } from '@angular/common';
import {Component, OnInit, Input} from '@angular/core';
import {ActivatedRoute, Params, Router} from '@angular/router';

import {isEmpty} from 'lodash';

import 'rxjs/add/operator/mergeMap';

import { CategoryModel} from '../../shared/category.model';
import { CategoryService } from '../../shared/category.service';
import {PostService} from '../shared/post.service';
import {PostModel} from '../shared/post.model';
import {AuthorService} from '../../author/shared/author.service';
import { SettingsService } from '../../shared/settings.service';
import {Title} from '@angular/platform-browser';
import { MetaService } from '../../shared/meta.service';


@Component({
    selector: 'app-post-list',
    templateUrl: './post-list.component.html',
    styleUrls: ['./post-list.component.css'],
    providers: [ CategoryService, PostService, AuthorService ]
})

export class PostListComponent implements OnInit {
    params: Params;
    category:  any;
    posts: PostModel[];
    fullSetting: any;
    settings: any;
    paginationSettings: any;
    column: any;
    page_count: number;
    @Input() isHomePage = false;

    constructor(private activatedRoute: ActivatedRoute,
                private locationService: Location,
                private categoryService: CategoryService,
                private postService: PostService,
                private settingsService: SettingsService,
                private titleService: Title,
                private metaService: MetaService) { }


    ngOnInit() {
        if (this.isHomePage) {
            this.getLatestPosts();
        }else {
            this.getSettingsCategoryPost();
        }
    }

    getSettingsCategoryPost() {
        this.activatedRoute.params.mergeMap(params => {
            this.params = params;

            return this.settingsService.getSettings();
        }).mergeMap(settings => {
            this.settings = settings;
            this.paginationSettings = settings.pagination;
            this.setColumn(this.settings.post_list.column);

            return this.categoryService.getCategoryByRouter(this.params.slug);
        }).mergeMap(category => {
            if (!isEmpty(category)) {
                this.category = category[0];
            }else {
                this.category.id = 0;
            }

            this.titleService.setTitle(this.category.name);

            return this.postService
                        .getPostsByCategoryId(this.category.id,
                                                this.paginationSettings.posts_per_page,
                                                this.params.page_index);
        })
        .subscribe(posts => {
                    this.posts = posts.body;
                    this.page_count = posts.headers.get('X-WP-TotalPages');

                    this.metaService.update(this.category.name,
                                            this.category.link,
                                            this.category.description,
                                            this.settings.og_image);
                 });
    }
    getLatestPosts() {
        this.activatedRoute.params.mergeMap(params => {
            this.params = params;

            return this.settingsService.getSettings();
        }).mergeMap(settings => {
            this.settings = settings;
            this.paginationSettings = settings.pagination;
            this.setColumn(settings.post_list.column);

            this.titleService.setTitle(settings.brand.title);

            return this.postService
                        .getPosts(this.paginationSettings.posts_per_page,
                                  false,
                                  this.params.page_index,
                                  true);
    }).subscribe(posts => {
                    this.posts = posts.body;
                    this.page_count = posts.headers.get('X-WP-TotalPages');

                    this.metaService.update(this.settings.brand,
                                            window.location.href,
                                            '',
                                            this.settings.og_image);
                });
    }


    setColumn(columnCount: number) {
        console.log(columnCount);
        this.column = {
            'pure-u-1': columnCount === 1,
            'pure-u-1-2': columnCount === 2,
            'pure-u-1-3': columnCount === 3,
            'pure-u-1-4': columnCount === 4,
        };
    }
}


