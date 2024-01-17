import { Module } from '@nestjs/common';
import { FollowUsService } from './follow-us.service';
import { FollowUsController } from './follow-us.controller';

@Module({
  controllers: [FollowUsController],
  providers: [FollowUsService],
})
export class FollowUsModule {}
