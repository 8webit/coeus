import { Component, OnInit } from '@angular/core';
import {Router, ActivatedRoute, Params} from '@angular/router';

import 'rxjs/add/operator/mergeMap';

import { isEmpty, has } from 'lodash';

import { PostService } from '../shared/post.service';
import {PostModel} from '../shared/post.model';
import {CategoryService} from '../../shared/category.service';
import {SettingsService} from '../../shared/settings.service';
import {Title} from '@angular/platform-browser';
import { MetaService } from '../../shared/meta.service';

@Component({
    templateUrl: './post.component.html',
    styleUrls: ['./post.component.css'],
    providers: [ PostService ]
})
export class PostComponent implements OnInit {
    params: Params;
    post: PostModel;
    settings: any;

    constructor(private router: Router,
                private titleService: Title,
                private activatedRoute: ActivatedRoute,
                private categoryService: CategoryService,
                private postService: PostService,
                private settingsService: SettingsService,
                private metaService: MetaService) { }

    ngOnInit() {
        this.getPost();
        this.getSettings();
     }

    getPost() {
        this.activatedRoute.params.mergeMap(params => {
            this.params = params;

            return this.categoryService.getCategoryByRouter(this.params.slug);
        }).mergeMap(category => {
            if (isEmpty(category)) {
                this.router.navigateByUrl('/error/404');
            }

            return this.postService.getPostBySlug(this.params.child_slug);
        }).subscribe(post => {
            if (isEmpty(post)) {
                this.router.navigateByUrl('/error/404');
            }

            this.post = post[0];
            this.titleService.setTitle(this.post.title.rendered);

            this.updateMeta();
        });
    }

    getSettings() {
        this.settingsService.getSettings().subscribe(settings => {
            this.settings = settings;
        });
    }

    onError() {
        this.router.navigate(['/error']);
    }

    updateMeta() {
        let image = [];

        if (has(this.post._embedded, 'wp:featuredmedia')) {
            if(this.post._embedded['wp:featuredmedia'][0].media_details.sizes.large){
                const large = this.post._embedded['wp:featuredmedia'][0].media_details.sizes.large;

                image[0] = large.source_url;
                image[1] = large.width;
                image[2] = large.height;
            }else{
                const medium = this.post._embedded['wp:featuredmedia'][0].media_details.sizes.medium;

                image[0] = medium.source_url;
                image[1] = medium.width;
                image[2] = medium.height;
            }

        }
        this.metaService.update(this.post.title.rendered,
                                this.post.link,
                                this.post.excerpt.rendered,
                                image,
                                true);
    }
}
