import { Component, OnInit } from '@angular/core';

import { first } from 'lodash';

import { PostService } from '../../posts/shared/post.service';
import { CategoryService } from '../../shared/category.service';

import { PostModel } from '../../posts/shared/post.model';
import { ThumbnailHelper } from '../../shared/thumbnail-helper';

@Component({
  selector: 'app-home-beta',
  templateUrl: './home-beta.component.html',
  styleUrls: ['./home-beta.component.css']
})
export class HomeBetaComponent implements OnInit {
  sticky: PostModel;
  categories: any;
  constructor(private postService: PostService,
              private categoryService: CategoryService) { }

  ngOnInit() {
    this.getStickies();
    this.getCategories();
  }

  getStickies() {
    this.postService.getStickies(1)
                    .subscribe(res => {
                      this.sticky = first(res);
                    });
  }

  getCategories() {
    this.categoryService.getCategories()
                        .subscribe(res => this.categories = res);
  }

  getThumbnail(post: PostModel): string {
    return ThumbnailHelper.url(post);
  }
}
