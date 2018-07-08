import { Component, OnInit, Input } from '@angular/core';

import { PostService } from '../../posts/shared/post.service';

import { Observable } from 'rxjs/Observable';
import { PostModel } from '../../posts/shared/post.model';
import { ThumbnailHelper} from '../../shared/thumbnail-helper';

@Component({
  selector: 'app-home-alfa',
  templateUrl: './home-alfa.component.html',
  styleUrls: ['./home-alfa.component.css'],
  providers: [PostService]
})
export class HomeAlfaComponent implements OnInit {
  stickies: PostModel[];
  posts: PostModel[];
  prevPosts = [];
  page = 10;

  stickyPostGrid: {};
  firstStickyPostGrid: {};

  constructor(private postService: PostService) {}

  ngOnInit(): void {
    this.getLatestPosts();
    this.getStickies();
  }

  getStickies() {
    this.postService.getStickies()
                    .subscribe(res => {
                      this.stickies = res;
                      this.setFirstStickyPostGrid();
                      this.setStickyPostGrid();
                    });
  }

  getLatestPosts() {
    this.postService.getPosts(10, true)
                    .subscribe(res => this.posts = res);
  }

  setStickyPostGrid() {
    this.stickyPostGrid = {
      'pure-u-1 pure-u-md-1-2' : this.stickies.length <= 3,
      'pure-u-1 pure-u-md-1-3' : this.stickies.length >= 4
    };
  }

  setFirstStickyPostGrid() {
    this.firstStickyPostGrid = {
      'first' : this.stickies.length >= 3 ||  this.stickies.length === 1,
      'pure-u-1-1 pure-u-md-1' : this.stickies.length >= 3,
      'pure-u-1 pure-u-md-1-2' : this.stickies.length < 3,
    };
  }

  getThumbnail(post: PostModel): string {
    return ThumbnailHelper.url(post);
  }

  loadMore() {
    this.postService.getPosts(10, true, this.page)
                    .subscribe(
                    posts => {
                      this.prevPosts.push(posts);
                      this.page++;

                      if (posts.length !== 10) {
                        this.page = 0 ;
                      }
                    },
                    err => this.page = 0);
  }
}
