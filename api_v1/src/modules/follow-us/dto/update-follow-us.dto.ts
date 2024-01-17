import { PartialType } from '@nestjs/mapped-types';
import { CreateFollowUsDto } from './create-follow-us.dto';

export class UpdateFollowUsDto extends PartialType(CreateFollowUsDto) {}
