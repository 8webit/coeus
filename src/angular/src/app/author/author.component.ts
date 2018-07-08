import { Component, OnInit } from '@angular/core';

import { isEmpty } from 'lodash';

import { AuthorService } from './shared/author.service';
import {ActivatedRoute, Params, Router} from '@angular/router';
import {AuthorModel} from './shared/author.model';
import {PostModel} from '../posts/shared/post.model';

import 'rxjs/add/operator/mergeMap';
import {PostService} from '../posts/shared/post.service';

@Component({
    selector: 'author',
    templateUrl: './author.component.html',
    styleUrls: ['./author.component.css'],
    providers: [ AuthorService, PostService ]
})
export class AuthorComponent implements OnInit {
    params: Params;
    author: AuthorModel;
    posts: PostModel[];

    constructor(private router: Router,
                private activatedRoute: ActivatedRoute,
                private authorService: AuthorService,
                private postService: PostService) { }

    ngOnInit() {
        this.getAuthorAndPosts();
     }

     getAuthorAndPosts() {
         this.activatedRoute.params.mergeMap(params => {
             this.params = params;

             return this.authorService.getAuthorBySlug(params.slug);
         }).mergeMap(author => {
             if (!isEmpty(author)) {
                 this.author = author[0];
             }else {
                 this.router.navigateByUrl('/error/404');
             }

             return this.postService.getPostsByAuthor(this.author.id);
         }).subscribe(result => this.posts = result);
     }
}
