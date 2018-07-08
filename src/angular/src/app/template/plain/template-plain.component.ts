import { Component, Input } from '@angular/core';

import { PostModel } from '../../posts/shared/post.model';

@Component({
  selector: 'app-template-plain',
  templateUrl: './template-plain.component.html',
  styleUrls: ['./template-plain.component.css']
})
export class TemplatePlainComponent {
  @Input() page: PostModel;

  constructor() {
  }
}
