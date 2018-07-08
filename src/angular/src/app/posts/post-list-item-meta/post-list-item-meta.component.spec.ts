import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PostListItemMetaComponent } from './post-list-item-meta.component';

describe('PostListItemMetaComponent', () => {
  let component: PostListItemMetaComponent;
  let fixture: ComponentFixture<PostListItemMetaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PostListItemMetaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PostListItemMetaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
