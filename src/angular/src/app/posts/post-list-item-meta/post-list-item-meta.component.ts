import { Component, OnInit, Input } from '@angular/core';
import { PostModel } from '../shared/post.model';

@Component({
  selector: 'app-post-list-item-meta',
  templateUrl: './post-list-item-meta.component.html',
  styleUrls: ['./post-list-item-meta.component.css']
})
export class PostListItemMetaComponent implements OnInit {
  @Input() post: PostModel;
  constructor() { }

  ngOnInit() {
  }
}
