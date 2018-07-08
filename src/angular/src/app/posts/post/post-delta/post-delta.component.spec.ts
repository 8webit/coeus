import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PostDeltaComponent } from './post-delta.component';

describe('PostDeltaComponent', () => {
  let component: PostDeltaComponent;
  let fixture: ComponentFixture<PostDeltaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PostDeltaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PostDeltaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
