import { Test, TestingModule } from '@nestjs/testing';
import { FollowUsController } from './follow-us.controller';
import { FollowUsService } from './follow-us.service';

describe('FollowUsController', () => {
  let controller: FollowUsController;

  beforeEach(async () => {
    const module: TestingModule = await Test.createTestingModule({
      controllers: [FollowUsController],
      providers: [FollowUsService],
    }).compile();

    controller = module.get<FollowUsController>(FollowUsController);
  });

  it('should be defined', () => {
    expect(controller).toBeDefined();
  });
});
