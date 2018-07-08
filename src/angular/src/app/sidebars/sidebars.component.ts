import { Component, Input } from '@angular/core';


@Component({
  selector: 'app-sidebars',
  templateUrl: './sidebars.component.html',
  styleUrls: ['./sidebars.component.css']
})
export class SidebarsComponent {
  @Input() sidebars: any;

  constructor() {}
}
